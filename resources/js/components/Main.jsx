import React, { Component } from 'react';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom';
import Image1 from './image/urban-event-space-model_925x.jpg';

function Main(props) {
    return (
        <div className="main-class primary-color">
            <div className="container">
                <GreetText />
                <MainContent />
            </div>
        </div>
    )
}

class MainContent extends Component {
    constructor(props) {
        super(props);
        this.state = {
            switchMenu: true
        }
    }

    newest() {
        this.setState({
            switchMenu: true
        });
    }

    recap() {
        this.setState({
            switchMenu: false
        });
    }

    render() {
        let styleSheet = {
            width: '100%',
            height: '100%'
        }
        return (
            <div>
                <MenuNavigation newest={this.newest.bind(this)} recap={this.recap.bind(this)} />
                {this.state.switchMenu ? 
                    <NewestFeed /> : 
                    <RecapScore />}
            </div>
        );
    }
}

class NewestFeed extends Component {
    render() {
        return (
            <div className="mt-5 animated zoomInDown delay-1">
                <h1>Newest Feed</h1>
            </div>
        )
    }
}

class RecapScore extends Component {
    render() {
        return (
            <div className="mt-5 animated zoomInDown delay-1">
                <h1>Recap Score</h1>
            </div>
        )
    }
}

function MenuNavigation(props) {
    return (
        <div className="row text-white animated fadeIn delay-1s">
            <div className="col-md-4" onClick={props.newest}>
                <Card title_card="Terbaru" text_card="Info terbaru sekolah" />
            </div>
            <div className="col-md-4" onClick={props.recap}>
                <Card title_card="Rekap Nilai" text_card="Info nilai terkini" />
            </div>
            <div className="col-md-4">
                <Card title_card="Classmates" text_card="Disekitar teman anda" />
            </div>
        </div>
    )
}

function Card(props) {
    let cardText = {
        fontSize: '.9rem'
    };
    return (
        <div className="card primary-color-background">
            <div className="card-body">
                <p className="card-title">{props.title_card}</p>
                <p className="card-text" style={cardText}>{props.text_card}</p>
            </div>
        </div>
    );
}

function GreetText() {
    return (
        <div className="main-class__greet-text pt-5 pb-5 animated bounceInDown">
            <Title />
            <Quote />
        </div>
    )
}

function Title() {
    let styleSheet = {
        fontSize: '50px',
        fontWeight: '900'
    }
    return (
        <h2 style={styleSheet}>Selamat Datang, John Doe</h2>
    )
}

function Quote() {
    let styleSheet = {
        fontSize: '20px',
        fontWeight: '500'
    }
    return (
        <blockquote style={styleSheet}>
            "Stay Foolish, Stay Hungry"
            <footer>- Steve Jobs</footer>
        </blockquote>
    )
}

export default Main;