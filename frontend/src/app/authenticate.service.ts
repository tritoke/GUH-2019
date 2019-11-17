import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class AuthenticateService {

  constructor(
    private http: HttpClient
  ) { }

  login(email: string, password: string) {
    return this.http.post('/login.php', {email, password});
  }

  signup(email: string, password: string) {
    return this.http.post('/signup.php', {email, password});
  }
}