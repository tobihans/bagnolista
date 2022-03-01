import EditorJS from '@editorjs/editorjs';
import config from './editorjs.config';

Alpine.data('form', () => ({
    editor: null,
    data: null, // Populated from inline script
    desc_keys: [], // Populated from inline script
    desc_values: [], // Populated from inline script
    description: '',
    pairPropertiesCount: 0,
    async remove() {
        this.$refs.deleteForm.submit();
    },
    async submit() {
        this.description = JSON.stringify(await  this.editor.save());
        this.$refs.desc.value = this.description;
        if (this.$refs.form.checkValidity())
            this.$refs.form.submit();
        else
            alert('Tous les champs du formulaire ne sont pas valides');
    },
    init() {
        this.data = data;
        this.desc_keys = desc_keys;
        this.desc_values = desc_values;
        this.pairPropertiesCount = desc_values.length;
        this.editor = new EditorJS({ ...config, data: this.data });
    }
}))
