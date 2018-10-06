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
    render() {
        let styleSheet = {
            width: '100%',
            height: '100%'
        }
        return (
            <MenuNavigation />
        );
    }
}

function MenuNavigation(props) {
    return (
        <div className="row text-white animated fadeIn delay-1s">
            <div className="col-md-4">
                <Card title_card="Terbaru" text_card="Info terbaru di sekitar sekolah" />
            </div>
            <div className="col-md-4">
                <Card title_card="Rekap Nilai" text_card="Info nilai terkini" />
            </div>
            <div className="col-md-4">
            <   Card title_card="Classmates" text_card="Disekitar teman anda" />
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