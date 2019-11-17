import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';

import { AuthenticateService } from '../authenticate.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginForm;

  constructor(
    private formBuilder: FormBuilder,
    // private authenticateService: AuthenticateService
    ) {
      this.loginForm = this.formBuilder.group({
        username: '',
        password: ''
      });
    }

  ngOnInit() {
    
    
  }
  onSubmit(loginData) {
    // this.authenticateService.login(loginData.email, loginData.password);
   // console.warn('Your order has been submitted', loginData);
  }

}