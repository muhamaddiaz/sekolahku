import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom';
import NavLeft from './NavLeft';


export default class Home extends Component {
    render() {
        return (
            <div>
                <NavLeft />
            </div>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Home />, document.getElementById('root'));
}
