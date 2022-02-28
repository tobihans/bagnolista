import EditorJS from '@editorjs/editorjs';
import Checklist from '@editorjs/checklist';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Header from '@editorjs/header';

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
        this.editor = new EditorJS({
            holder: 'editor',
            placeholder: 'Décrivez le véhicule en quelques mots',
            tools: {
                header: {
                    class: Header,
                    config: {
                        placeholder: 'Enter a header',
                        levels: [3, 4, 5],
                        defaultLevel: 3,
                    },
                },
                checklist: {
                    class: Checklist,
                    inlineToolbar: true,
                },
                list: {
                    class: List,
                    inlineToolbar: true,
                },
                quote: {
                    class: Quote,
                    config: {
                        quotePlaceholder: 'Citation',
                        captionPlaceholder: 'Auteur',
                    },
                },
            }
        });
    }
}))
