import axios from 'axios';
const httpRequest = axios.create({
    baseURL: import.meta.env.VITE_APP_BASE_URL,
});

export default httpRequest;
