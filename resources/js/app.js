import './bootstrap';
import '../sass/app.scss'
import { formSubmit } from "./form.js";
import { getTable } from "./table.js";

const UPDATE_TABLE_URL = '/api/message/index';

document.addEventListener("DOMContentLoaded", ready);


function ready() {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.addEventListener('click', formSubmit);
    getTable(UPDATE_TABLE_URL);
}
