import Header from "@editorjs/header";
import Checklist from "@editorjs/checklist";
import List from "@editorjs/list";
import Quote from "@editorjs/quote";

export default {
    holder: 'editor',
    placeholder: 'Décrivez le véhicule en quelques mots',
    tools: {
        header: {
            class: Header,
            config: {
                placeholder: 'Enter a header',
                levels: [2, 3, 4, 5],
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
}
