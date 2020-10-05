import React, { Component } from 'react';
import {Helmet} from "react-helmet";
import { Link } from 'react-router-dom';
import ReactDOM from 'react-dom';

export default class PostSlug extends Component {
	constructor(props) {
        super(props);
        this.state = {
            error: false,
            isLoaded: false,
            processing: false,
            post:{},
        }  
    }    
    componentDidMount(){
         console.log(this.props.history.location.pathname)


        axios.post('/api'+this.props.history.location.pathname)

        .then((response)=>{
            console.log(response)
            this.setState({post:response.data.post,'isLoaded':true,'paginate':response.data.paginate,processing:false});
        })
        .catch((error)=>{
            this.setState({'isLoaded':true,error:true,processing:false});
        });
    }
   
    render() {

        const {error,isLoaded,post,processing} = this.state;


        return (

            <section id="portfolio"  className="section-bg page-content" >
            <div className="container">
                <div className="row">


                    <div className="col-md-4">
                        <div className="single-blog-page">
              
                          <div className="left-blog">
                            <h4>recent post</h4>
                            <div className="recent-post">
                              
                              <div className="recent-single-post">
                                <div className="post-img">
                                  <a href="#">
                                                               <img src="img/blog/1.jpg" alt="" />
                                                            </a>
                                </div>
                                <div className="pst-content">
                                  <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                </div>
                              </div>
                              
                              
                              <div className="recent-single-post">
                                <div className="post-img">
                                  <a href="#">
                                                               <img src="img/blog/2.jpg" alt="" />
                                                            </a>
                                </div>
                                <div className="pst-content">
                                  <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                </div>
                              </div>
                              
                              
                              <div className="recent-single-post">
                                <div className="post-img">
                                  <a href="#">
                                                               <img src="img/blog/3.jpg" alt="" />
                                                            </a>
                                </div>
                                <div className="pst-content">
                                  <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                </div>
                              </div>
                              
                              
                              <div className="recent-single-post">
                                <div className="post-img">
                                  <a href="#">
                                                               <img src="img/blog/4.jpg" alt="" />
                                                            </a>
                                </div>
                                <div className="pst-content">
                                  <p><a href="#"> Redug Lerse dolor sit amet consect adipis elit.</a></p>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                          
                        </div>  
                    </div>


                    <div className="col-md-8">
                        <div className="col-md-12 col-sm-12 col-xs-12">
              
              <article className="blog-post-wrapper">
                <div className="post-thumbnail">
                  <img src={post.image} alt={post.title} />
                </div>
                <div className="post-information">
                  <h2>{post.title}</h2>
                  <div className="entry-meta">
                    <span className="author-meta"><i className="fa fa-user"></i> <a href="#">admin</a></span>
                    <span><i className="fa fa-clock-o"></i> march 28, 2016</span>
                    <span className="tag-meta">
                                                <i className="fa fa-folder-o"></i>
                                                <a href="#">painting</a>,
                                                <a href="#">work</a>
                                            </span>
                    <span>
                                                <i className="fa fa-tags"></i>
                                                <a href="#">tools</a>,
                                                <a href="#"> Humer</a>,
                                                <a href="#">House</a>
                                            </span>
                    <span><i className="fa fa-comments-o"></i> <a href="#">6 comments</a></span>
                  </div>
                  <div className="entry-content">

                   <div dangerouslySetInnerHTML={{__html: post.body}}>
                    </div>

                  </div>
                </div>
              </article>
              <div className="clear"></div>
              <div className="single-post-comments">
                <div className="comments-area">
                  <div className="comments-heading">
                    <h3>6 comments</h3>
                  </div>
                  <div className="comments-list">
                    <ul>
                      <li className="threaded-comments">
                        <div className="comments-details">
                          <div className="comments-list-img">
                            <img src="img/blog/b02.jpg" alt="post-author" />
                          </div>
                          <div className="comments-content-wrap">
                            <span>
                                                                <b><a href="#">demo</a></b>
                                                                Post author
                                                                <span className="post-time">October 6, 2014 at 4:25 pm</span>
                            <a href="#">Reply</a>
                            </span>
                            <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div className="comments-details">
                          <div className="comments-list-img">
                            <img src="img/blog/b02.jpg" alt="post-author" />
                          </div>
                          <div className="comments-content-wrap">
                            <span>
                                                                <b ><a href="#">admin</a></b>
                                                                Post author
                                                                <span className="post-time">October 6, 2014 at 6:18 pm </span>
                            <a href="#">Reply</a>
                            </span>
                            <p>Quisque orci nibh, porta vitae sagittis sit amet, vehicula vel mauris. Aenean at justo dolor. Fusce ac sapien bibendum, scelerisque libero nec</p>
                          </div>
                        </div>
                      </li>
                      <li className="threaded-comments">
                        <div className="comments-details">
                          <div className="comments-list-img">
                            <img src="img/blog/b02.jpg" alt="post-author" />
                          </div>
                          <div className="comments-content-wrap">
                            <span>
                                                                <b><a href="#">demo</a></b>
                                                                Post author
                                                                <span className="post-time">October 6, 2014 at 7:25 pm</span>
                            <a href="#">Reply</a>
                            </span>
                            <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur</p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <div className="comment-respond">
                  <h3 className="comment-reply-title">Leave a Reply </h3>
                  <span className="email-notes">Your email address will not be published. Required fields are marked *</span>
                  <form action="#">
                    <div className="row">
                      <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p>Name *</p>
                        <input type="text" />
                      </div>
                      <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p>Email *</p>
                        <input type="email" />
                      </div>
                      <div className="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p>Website</p>
                        <input type="text" />
                      </div>
                      <div className="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                        <p>Website</p>
                        <textarea id="message-box" cols="30" rows="10"></textarea>
                        <input type="submit" value="Post Comment" />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              
            </div>
                    </div>


                </div>
            </div>
                
            </section>

              );
    }
}