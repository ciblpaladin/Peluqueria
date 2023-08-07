import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ResponseInterface } from '../Interface/ResponseInterface';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private http : HttpClient) { }
 
  auth_login(column: string, value: string, pass:string) : Observable<ResponseInterface> {
    
    return this.http.post<ResponseInterface>("http://127.0.0.1:8000/api/auth/"+column+"/"+value+"/"+pass, "")

  }
}


