import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';

export default class Services extends Component {
	constructor(props) {
        super(props);  
    }
    render() {
        return (
          <div>
          <Helmet>
            <meta charSet="utf-8" />
            <title>The Code | Services</title>
            <meta name="description" content="This is services page" />
          </Helmet>
           <section id="services" className="page-content">
      <div className="container">

        <header className="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div className="row">

          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-analytics-outline"></i></div>
            <h4 className="title"><a href="">Lorem Ipsum</a></h4>
            <p className="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-bookmarks-outline"></i></div>
            <h4 className="title"><a href="">Dolor Sitema</a></h4>
            <p className="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-paper-outline"></i></div>
            <h4 className="title"><a href="">Sed ut perspiciatis</a></h4>
            <p className="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-speedometer-outline"></i></div>
            <h4 className="title"><a href="">Magni Dolores</a></h4>
            <p className="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-barcode-outline"></i></div>
            <h4 className="title"><a href="">Nemo Enim</a></h4>
            <p className="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div className="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div className="icon"><i className="ion-ios-people-outline"></i></div>
            <h4 className="title"><a href="">Eiusmod Tempor</a></h4>
            <p className="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

        </div>

      </div>
    </section>

    <section id="call-to-action" className="wow fadeIn">
      <div className="container text-center">
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a className="cta-btn" href="#">Call To Action</a>
      </div>
    </section>
    </div>
        );
    }
}