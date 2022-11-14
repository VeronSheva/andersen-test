import {API} from "./Api.js";
const UPDATE_TABLE_URL = '/api/message/index';

export async function getTable(url = UPDATE_TABLE_URL) {
    try{
        const resp = await API.get(url);
        renderRows(resp.data);
        renderPagination(resp.links)
    } catch (e) {
        alert('Error')
    }
}

function renderRows(rows) {
    const tbody = document.getElementById('tbody');
    tbody.textContent = '';
    for (const row of rows) {
        const tr = document.createElement('tr');
        let fields = [];
        for (const [k, v] of Object.entries(row)) {
            if (k === 'id') {
                const th = document.createElement('th');
                th.setAttribute('scope', 'row');
                th.append(v.toString());
                fields.push(th);
            } else {
                const td = document.createElement('td')
                td.append(v.toString());
                fields.push(td);
            }
        }
        tr.append(...fields)
        tbody.append(tr);
    }
}
function renderPagination(links) {
    const pagination = document.getElementById('pagination');
    pagination.textContent = '';
    let list = [];
    links.forEach(link => {
        const li = document.createElement('li');
        const span = document.createElement('span');
        li.setAttribute('class', 'page-item' + (link.active ? ' active' : ''));
        span.setAttribute('class', 'page-link');
        span.append(link.label.replace(/&(r|l)aquo;/g, ''))
        if (null === link.url) {
            li.classList.add('disabled')
        } else {
            span.addEventListener('click',function () {
                getTable(link.url);
            })
        }
        li.append(span)
        list.push(li);
    })
    pagination.append(...list);
}
