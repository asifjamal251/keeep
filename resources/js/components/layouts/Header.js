import React, { Component } from 'react';
import  {NavLink} from 'react-router-dom'
export default class Header extends Component {
   constructor(props) {
        super(props); 
         this.state = {
            site_title:'',
            logo:'',
            site_description:'',
        };  
    }

    componentDidMount(){
        axios.post('/api/site-details')
         .then(response=>{
            this.setState({site_title:response.data.site_title,logo:response.data.logo});
        });

        
    }

    render() {
      //console.log(this.props.history.location.pathname)

      const {site_title,site_description,logo} = this.state;
        return (

         <header id="header">
            <div className="container">

              <div id="logo" className="pull-left">

              <NavLink className="navbar-brand"  exact={true} to="/">
                <img src={logo} alt={site_title} title={site_title} />
              </NavLink>
               
              </div>

              <nav id="nav-menu-container">
                <ul className="nav-menu">

                  <li className="menu-active">
                    <NavLink className="nav-link"  exact={true} to="/">Home</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/about">About</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/services">Services</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/blog">Blog</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/contact">Contact</NavLink>
                  </li>

                  <li>
                    <NavLink className="nav-link" exact={true} to="/contact/list">Contact List</NavLink>
                  </li>
                </ul>
              </nav>
            </div>
        </header>
        );
    }
}