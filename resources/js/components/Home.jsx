import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom';
import NavLeft from './NavLeft';
import Main from './Main';
import Notification from './Notification';


export default class Home extends Component {
    constructor(props) {
        super(props);
        this.state = {
            marginLeftCt: {
                marginLeft: '100px'
            }
        }
    }
    render() {
        return (
            <Router>
                <div>
                    <NavLeft />
                    <div style={this.state.marginLeftCt}>
                        <Switch>
                            <Route path="/home" component={Main} exact />
                            <Route path="/notification" component={Notification} exact />
                        </Switch>
                    </div>
                </div>
            </Router>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Home />, document.getElementById('root'));
}
