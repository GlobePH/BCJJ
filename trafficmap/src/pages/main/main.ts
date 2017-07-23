import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

import { AboutPage } from '../about/about';
import { ContactPage } from '../contact/contact';
import { WelcomePage } from '../welcome/welcome';

@Component({
  selector: 'page-main',
  templateUrl: 'main.html'
})

export class MainPage {

  tab1Root = WelcomePage;
  tab2Root = AboutPage;
  tab3Root = ContactPage;

  constructor(public navCtrl: NavController) {

  }

}
