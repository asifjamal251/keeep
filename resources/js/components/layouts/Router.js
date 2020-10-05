import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {Route,Switch} from 'react-router-dom';
import Home from './../pages/Home'
import About from './../pages/About'
import Post from './../blog/Post'
import PostSlug from './../blog/PostSlug'
import Services from './../pages/Services'
import Contact from './../pages/Contact'
import ContactList from './../pages/ContactList'

export default class Router extends Component {
componentDidMount() {
  window.scrollTo(0, 0)
}
    render() {
        return (
            <Switch>
                <Route exact path="/" component={Home} />
                <Route exact path="/about" component={About} />
                <Route exact path="/services" component={Services} />
                <Route exact path="/blog" component={Post} />
                <Route exact path="/post/:slug" component={PostSlug} />
                <Route exact path="/contact" component={Contact} />
                <Route exact path="/contact/list" component={ContactList} />
            </Switch>
        );
    }
}