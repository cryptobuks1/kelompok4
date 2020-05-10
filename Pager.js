import React from 'react';
import { StyleSheet, Text, View } from 'react-native';
import { BottomNavigation, Card } from 'react-native-material-ui';
import Home from './Pages/Home.js';
import Ewallet from './Pages/Ewallet.js';
import EStore from './Pages/Estore.js';


export default class Pager extends React.Component{
	constructor(state){
		super(state)
	}

	render(){
		return (
			<View>
				{this.props.page == 'home' ? <Home navigation={this.props.navigation}/> : 
				this.props.page == 'ewallet' ? <Ewallet navigation={this.props.navigation}/> : 
				this.props.page == 'shop' ? <EStore navigation={this.props.navigation}/> : <View/>

				}
			</View>
		)
	}

}