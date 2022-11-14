import {API} from "./Api.js";
import { getTable } from "./table.js";

const VAlID = 'is-valid';
const INVAlID = 'is-invalid';
const SEND_MESSAGE_URL = '/api/message/store';


export async function formSubmit() {
    const data = {
        name:    document.getElementById('name'),
        email:   document.getElementById('email'),
        message: document.getElementById('message')
    };

    if(!isValid(data)) return;

    try {
        await API.post(SEND_MESSAGE_URL, getValues(data));
        await getTable();
        clear(data);
    } catch (InvalidDataException) {
        const invalidFields = InvalidDataException.data;
        invalidFields.forEach(elem => {
            markInvalid(data[elem.property]);
        })
    }
}

function getValues(form) {
    let obj = {}
    for (const key in form) {
        obj[key] = form[key].value;
    }
    return obj
}

function markInvalid(elem) {
    elem.classList.add(INVAlID);
}

function markValid(elem) {
    elem.classList.add(VAlID);
}

function clear(fields) {
    for (const field of Object.entries(fields)) {
        field[1].value = '';
        if (field[1].classList.contains(VAlID)) {
            field[1].classList.remove(VAlID);
        }
        if (field[1].classList.contains(INVAlID)) {
            field[1].classList.remove(INVAlID);
        }
    }
}

function isValid(fields) {
    let valid = true;
    for (const field of Object.entries(fields)) {
        if (field[1].value.length < 2) {
            markInvalid(field[1]);
            valid = false;
        } else markValid(field[1])
    }
    return valid;
}
