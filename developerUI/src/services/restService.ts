import axios, { AxiosResponse } from 'axios';
import { Rest, RestHeader } from '../helpers/rest';

class RestService {

  axios;

  constructor() {
    this.axios = axios.create({});
  }
  // public postWithOutToken(data,url): Promise<AxiosResponse<any>> {
  //   return this.axios.post(url, data,
  //     { headers: Rest.getHeaders(RestHeader.APPLICATION_JSON_WITHOUT_BEARER_TOKEN) }).then(ag => {
  //       return ag;
  //     }).catch(err => {
      
  //       return err;
        
  //     });
  // }
}

export default new RestService();
