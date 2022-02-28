import EditorJS from '@editorjs/editorjs';
import Checklist from '@editorjs/checklist';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import Header from '@editorjs/header';

Alpine.data('form', () => ({
    description: '',
    addPair() {
        console.log(this.$refs.descriptionBlock)
    },
    init() {
        const editor = new EditorJS({
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

Alpine.start();
