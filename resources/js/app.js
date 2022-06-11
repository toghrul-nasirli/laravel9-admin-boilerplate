import Jquery from "jquery";
import Swal from "sweetalert2";
import TinyMCE from "tinymce";

try {
    require("bootstrap");
    
    window.$ = window.jQuery = Jquery;
    window.Swal = Swal;
    window.tinymce = TinyMCE;
} catch (e) {
    console.log(e);
}
