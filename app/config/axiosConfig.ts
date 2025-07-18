import axios from 'axios'
import {API_BASE_URL} from './env'
import * as SecureStore from 'expo-secure-store'

const axiosInstance = axios.create({
       baseURL : API_BASE_URL, 
       headers : {
        'Content-Type': 'application/json',
        'Accept' : 'application/json'
       },
       withCredentials: true,


});
axiosInstance.interceptors.request.use(
   
            async (config) => {
                console.log('Interceptor fired');
                const token = await SecureStore.getItemAsync('session');
                console.log('Token from SecureStore:', token); 
                if (token) {
                config.headers.Authorization = `Bearer ${token}`;
                }
                return config;
            },
            (error) => Promise.reject(error)
);
    


export default axiosInstance