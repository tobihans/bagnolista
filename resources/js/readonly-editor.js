import EditorJS from '@editorjs/editorjs';
import config from './editorjs.config';

// The data variable is passed by Laravel in another script tag before this one is loaded
const editor = new EditorJS({...config, readOnly: true, placeholder: '', data})
