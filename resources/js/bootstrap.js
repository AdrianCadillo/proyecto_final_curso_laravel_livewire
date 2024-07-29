import axios from 'axios';
import sweetalert2 from 'sweetalert2';
window.axios = axios;
window.Swal = sweetalert2;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
