import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';


export default class Fuature extends Component {
	constructor(props) {
        super(props); 
         this.state = {
            sliders: []
        }; 
    }

    componentDidMount() {

        axios.post('/api/slider')
         .then(response=>{
            this.setState({sliders:response.data});
        });     
    }

    render() {
        return (
             <section id="intro">
    <div className="intro-container">
      <div id="introCarousel" className="carousel  slide carousel-fade" data-ride="carousel">

        

        <ol className="carousel-indicators">

         {
          this.state.sliders.map((slider,key)=>{

          return(

            <li  className={'dote ' + (key==0&&"active")} data-target="#introCarousel" data-slide-to={key} key={key} ></li>

             )

          })

        }

        </ol>

        <div className="carousel-inner" role="listbox">

        {
          this.state.sliders.map((slider,key)=>{

          return(
          <div className={'carousel-item '+ (key==0&&"active")} key={key}>
            <div className="carousel-background" style={{float:'right'}}><img src={slider.image} alt="" /></div>
            <div className="carousel-container">
              <div className="carousel-content">
                <h2>{slider.title}</h2>
                <p>{slider.sub_title}</p>
                <Link className="btn-get-started" to="/about">{slider.button_text}</Link>
              </div>
            </div>
          </div>
          )

          })

        }


        </div>

        <a className="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span className="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span className="sr-only">Previous</span>
        </a>

        <a className="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span className="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span className="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section>

        );
    }
}