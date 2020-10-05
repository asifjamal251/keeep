import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';

export default class About extends Component {
	constructor(props) {
        super(props);  
    }
    render() {
        return (
            <section id="about" className="page-content">
            <Helmet>
              <meta charSet="utf-8" />
              <title>The Code | About</title>
              <meta name="description" content="This is about page" />
            </Helmet>

      <div className="container">

        <header className="section-header">
          <h3>About Us</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </header>

        <div className="row about-cols">

          <div className="col-md-4 ">
            <div className="about-col">
              <div className="img">
                <img src="/web/img/about-mission.jpg" alt="" className="img-fluid" />
                <div className="icon"><i className="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 className="title"><a href="#">Our Mission</a></h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
              </p>
            </div>
          </div>

          <div className="col-md-4 " data-wow-delay="0.1s">
            <div className="about-col">
              <div className="img">
                <img src="/web/img/about-plan.jpg" alt="" className="img-fluid" />
                <div className="icon"><i className="ion-ios-list-outline"></i></div>
              </div>
              <h2 className="title"><a href="#">Our Plan</a></h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem  doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
              </p>
            </div>
          </div>

          <div className="col-md-4 " data-wow-delay="0.2s">
            <div className="about-col">
              <div className="img">
                <img src="/web/img/about-vision.jpg" alt="" className="img-fluid" />
                <div className="icon"><i className="ion-ios-eye-outline"></i></div>
              </div>
              <h2 className="title"><a href="#">Our Vision</a></h2>
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>
        );
    }
}