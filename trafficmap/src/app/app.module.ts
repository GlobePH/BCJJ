import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { AboutPage } from '../pages/about/about';
import { ContactPage } from '../pages/contact/contact';
import { MainPage } from '../pages/main/main';
import { WelcomePage } from '../pages/welcome/welcome';
import { ModalContent } from '../pages/welcome/modal';
import { ModalContentMain } from '../pages/home/modal';
import { LoginMain } from '../pages/home/login';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    MainPage,
    AboutPage,
    ContactPage,
    WelcomePage,
    ModalContent,
    ModalContentMain,
    LoginMain
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    MainPage,
    AboutPage,
    ContactPage,
    WelcomePage,
    ModalContent,
    ModalContentMain,
    LoginMain
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
