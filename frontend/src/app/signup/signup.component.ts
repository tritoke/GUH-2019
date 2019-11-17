import { Component, OnInit } from '@angular/core';
import { FormBuilder } from '@angular/forms';

import { AuthenticateService } from '../authenticate.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  signupForm;

  constructor(
    private formBuilder: FormBuilder,
    // private authenticateService: AuthenticateService
    ) {
      this.signupForm = this.formBuilder.group({
        username: '',
        password: ''
      });
    }


  ngOnInit() {
  }

  onSubmit(signupData) {
    // this.authenticateService.signup(signupData.email, signupData.password);
    //console.warn('Your order has been submitted', signupData);
  }
}