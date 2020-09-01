"use strict";

window.jQuery = window.$ = require("jquery");

//imports
require("bootstrap");
require("clipboard");
require("jquery-form");
require("bootstrap-daterangepicker");
require("bootstrap-select");
require("bootstrap-switch");
require("bootstrap-notify");
require("bootstrap-datepicker");
require("bootstrap-datetime-picker");
// require("select2");
require("bootstrap-timepicker");
require("inputmask/dist/jquery.inputmask.bundle");
require("inputmask/dist/inputmask/inputmask.date.extensions");
require("inputmask/dist/inputmask/inputmask.numeric.extensions");
require("jquery-validation");
require("jquery-validation/dist/additional-methods.js");
require("bootstrap-filestyle");
require("jquery-mask-plugin");
require("datatables.net-bs4");
require("datatables.net-buttons-bs4");
require("datatables.net-colreorder-bs4");
require("datatables.net-fixedcolumns-bs4");
require("datatables.net-fixedheader-bs4");
require("datatables.net-keytable-bs4");
require("datatables.net-responsive-bs4");



//globals
window.moment = require("moment");
window.Popper = require("popper.js");
window.toastr = require("toastr");
window.Tooltip = require("tooltip.js");
window.swal = require("sweetalert");
window.ClipboardJS = require("clipboard");
window.$.fn.DataTable = require("datatables.net");
require('./vendor/mmenu.min.js');
// require('./vendor/tippy.all.min.js');
require('./vendor/simplebar.min.js');
require('./vendor/bootstrap-slider.min.js');
require('./vendor/bootstrap-select.min.js');
require('./vendor/snackbar.js');
require('./vendor/counterup.min.js');
require('./vendor/magnific-popup.min.js');
require('./vendor/slick.min.js');
require('./vendor/custom.js');
window.tippy = require('./vendor/tippy.all.min.js');
require('./components/jobs');

import Config from './plugins/config';

$(document).ready(() => {
    const config = Config;

    config.init();
});
