import React, { Component } from 'react';
import {BrowserRouter as Router, Route, Link, Switch} from 'react-router-dom';

// Icon Import
import SchoolIcon from './education/school.svg';
import BellIcon from './education/bell.svg';
import StatIcon from './education/pie-chart.svg';
import ClipIcon from './education/clip.svg';
import LibraryIcon from './education/library.svg';
import AdminIcon from './avatar/man-1.svg';


class NavLeft extends Component {
    constructor(props) {
        super(props);
        this.state = {
            iconStyle: {
                width: '40px', 
                height: '40px'
            },
            paddingIcon: {
                padding: '10px 0'
            }
        }
    }
    render() {
        console.log(this.props);
        return(
            <div className="navbar-custom__left">
                <div className="navbar-custom__left--container">
                    <ul className="navbar-custom__item-horizon navbar-custom__item-horizon--top">
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={SchoolIcon} linkto="/home" />
                        </li>
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={BellIcon} linkto="/notification" />
                        </li>
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={StatIcon} linkto="/statistics" />
                        </li>
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={ClipIcon} linkto="/emading" />
                        </li>
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={LibraryIcon} linkto="/elibrary" />
                        </li>
                    </ul>
                    <ul className="navbar-custom__item-horizon navbar-custom__item-horizon--bottom">
                        <li>
                            <IconLink iconStyle={this.state.iconStyle}
                                iconName={AdminIcon} linkto="/admin" />
                        </li>
                    </ul>
                </div>
            </div>
        )
    }
}

function IconLink(props) {
    return (
        <Link to={props.linkto}>
            <img style={props.iconStyle} 
            src={props.iconName}/>
        </Link>
    )
}

export default NavLeft;