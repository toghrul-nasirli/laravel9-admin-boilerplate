import Jquery from "jquery";
import Swal from "sweetalert2";
import TinyMCE from "tinymce";

try {
    // window.Popper = require('@popperjs/core').default;
    // require("bootstrap");
    
    window.$ = window.jQuery = Jquery;
    window.Swal = Swal;
    window.tinymce = TinyMCE;
} catch (e) {
    console.log(e);
}
