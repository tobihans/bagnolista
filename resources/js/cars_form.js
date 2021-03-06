import EditorJS from '@editorjs/editorjs';
import config from './editorjs.config';

Alpine.data('form', () => ({
    editor: null,
    description: '',
    pairPropertiesCount: 0,
    addPair() {
        const clone = this.$refs.keyValBlock.cloneNode(true);
        clone.removeAttribute('x-ref');
        this.$refs.pairsBlock.insertBefore(clone, this.$refs.pairBtn);
        console.log(clone);
    },
    async submit() {
        this.description = JSON.stringify(await  this.editor.save());
        this.$refs.desc.value = this.description;
        console.log(this.description);
        if (this.$refs.form.checkValidity())
            this.$refs.form.submit();
        else
            alert('Tous les champs du formulaire ne sont pas valides');
    },
    init() {
        this.editor = new EditorJS(config);
    }
}))
