import { InvalidDataException } from "./exceptions.js";

class Api {

    async post(url, params = '') {
        const response = await fetch(url, {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json;charset=utf-8"
            },
            credentials: "same-origin",
            body: JSON.stringify(params)
        });

        return this.responseHandler(response);
    }

    async get(url, params = {}) {
        const getParams = this.buildUri(params);
        const response = await fetch(url + getParams, {
            method: "GET",
            mode: "cors",
            headers: {
                "Content-Type": "application/json;charset=utf-8"
            },
            credentials: "same-origin",
        });

        return this.responseHandler(response);
    }

    buildUri(params = {}) {
        if (Object.keys(params).length === 0) return ''
        let uri = '?';
        let p = [];
        Object.entries(params).forEach((val) => {
            p.push(`${val[0]}=${val[1]}`);
        });
        uri += encodeURI(p.join('&'));
        return uri;
    }

    async responseHandler(response) {
        switch (response.status) {
            case 200:
                return response.json();
            case 422:
                throw new InvalidDataException(await response.json())
            case 500:
                alert("Server internal error");
                break;
            default:
                alert('Something went wrong');
        }
    }
}

export const API = new Api();
