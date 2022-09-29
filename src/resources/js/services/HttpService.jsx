import axios from 'axios';

class HttpService {
    constructor() {
    }

    async exec(config) {
        return await new Promise(resolve=>{
            axios[config.method](config.url, config.payload)
                .then((response)=>{
                    resolve(response.data);

                }).catch((error)=>{
                    console.log('Http Error: ', error)
                    resolve(error.response.data);
                })
        })
    }
}

export default new HttpService();
