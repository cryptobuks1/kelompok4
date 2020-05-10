import React, { Component } from 'react';
import { ActionButton } from 'react-native-material-ui';
import { StyleSheet, View, ScrollView, TextInput } from 'react-native';
import { Card, Item, Input, Drawer, CardItem, Container, Header, Title, Content, Footer, FooterTab, Button, Left, Right, Body, Icon, H1, H2, H3, Text, Grid, Col } from 'native-base';

export default class EStore extends Component{
	constructor(state){
		super(state)
	}



	render(){
		return(
			<View>

			<View>
			  <Header searchBar rounded>
			    <Item>
			      <Icon name="ios-search" />
			      <Input placeholder="Search" showSoftInputOnFocus={false} caretHidden={true} onTouchStart={()=> this.props.navigation.navigate('StoreSearch')} />
			      <Icon name="ios-cart" />
			    </Item>
			  </Header>
			</View>

			<ScrollView style={{marginTop : 25}}>
				<Text>a</Text>
				<Text>b</Text>
				<Text>c</Text>
				<Text>d</Text>
				<Text>e</Text>
				<Text>f</Text>
				<Text>g</Text>
				<Text>h</Text>
				<Text>i</Text>
				<Text>j</Text>
				<Text>l</Text>
				<Text>m</Text>
				<Text>n</Text>
				<Text>o</Text>
				<Text>p</Text>
				<Text>q</Text>
				<Text>r</Text>
				<Text>s</Text>
				<Text>t</Text>
				<Text>u</Text>
				<Text>v</Text>
				<Text>w</Text>
				<Text>x</Text>
				<Text>y</Text>
				<Text>z</Text>
				<Text>aa</Text>
				<Text>ab</Text>
				<Text>ac</Text>
				<Text>ad</Text>
				<Text>ae</Text>
				<Text>af</Text>
				<Text>ag</Text>
				<Text>ah</Text>
				<Text>ai</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
				<Text>aj</Text>
			</ScrollView>
			</View>
		)
	}
}