import { Component } from '@angular/core';
import { ViewController } from 'ionic-angular';
import { NavController } from 'ionic-angular';

import { MainPage } from '../main/main';

@Component({
  templateUrl: 'login.html'
})

export class LoginMain {
constructor(public viewCtrl: ViewController, public navCtrl: NavController) {}
 cancel() {
   let data = { 'foo': 'bar' };
   this.viewCtrl.dismiss(data);
 }
 goToOtherPage() {
    this.navCtrl.push(MainPage);
  }
}

