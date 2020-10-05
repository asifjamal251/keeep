import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter} from 'react-router-dom';
import axios from 'axios';
import Header from './layouts/Header';
import Footer from './layouts/Footer';
import MobileNav from './layouts/MobileNav';
import Router from './layouts/Router';

export default class App extends Component {


    render() {
        return (
            <BrowserRouter>
                <div className="container-fluid px-0">

                <Header />

                    <div className="main-page">

                        <Router />
                            
                    </div>

                <Footer />
                <MobileNav />

                </div>
             </BrowserRouter>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
