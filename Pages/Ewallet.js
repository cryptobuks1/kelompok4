import { Card, Drawer, CardItem, Container, Header, Title, Content, Footer, FooterTab, Button, Left, Right, Body, Icon, H1, H2, H3, Text, Grid, Col } from 'native-base';
import React from 'react';
import { StyleSheet, View, SafeAreaView, TouchableNativeFeedback } from 'react-native';
import { useSelector, useDispatch } from 'react-redux';
import store from '../Actionate/storeStore.js';


export default class Ewallet extends React.Component{
	constructor(state){
		super(state)
		this.state = store.getState();
	}




	render(){

		return(
			<View>
				    <Card>
				      <CardItem header>
				          <H3>Saldo tersisa : {this.state.token}</H3>
				        </CardItem>
				        <CardItem body>
				                <View style={{flex: 3, flexDirection:'row', justifyContent: 'space-between'}}>
				                <View style={{flex: 1,marginRight: 22, marginLeft: 22}}>
				                  <Button rounded large 
				                  	style={{ justifyContent: "center" }} 
				                  	background={TouchableNativeFeedback.Ripple('#D3D3D3', true)}
				                  	onPress={() => {
				                  		console.log(store.getState());
				                  	}}>
				                    <Icon type="FontAwesome" name='plus'/>
				                  </Button>
				                  <View style={{ flex:1,justifyContent: "center",alignItems: "center", marginTop: 20}}>
				                    <Text style={{ textAlignVertical: "center",textAlign: "center"}}>Tambah Saldo</Text>
				                  </View>
				                </View>
				                  <View style={{flex: 1,marginRight: 22, marginLeft: 22}}>
				                    <Button rounded large 
				                    style={{ justifyContent: "center" }} 
				                    background={TouchableNativeFeedback.Ripple('#D3D3D3', true)}
				                    onPress={() => {
				                    	store.dispatch({
				                    		type : "SET_TOKEN",
				                    		payload : {
				                    			token : "WOW Token"
				                    		}
				                    	});
				                    }}>
				                      <Icon type="FontAwesome" name='exchange'/>
				                    </Button>
				                    <View style={{ flex:1,justifyContent: "center",alignItems: "center", marginTop: 20}}>
				                      <Text style={{ textAlignVertical: "center",textAlign: "center"}}>Transfer Saldo</Text>
				                    </View>
				                  </View>
				                  <View style={{flex: 1,marginRight: 22, marginLeft: 22}}>
				                    <Button rounded large style={{ justifyContent: "center" }} background={TouchableNativeFeedback.Ripple('#D3D3D3', true)}>
				                      <Icon type="FontAwesome" name='history'/>
				                    </Button>
				                    <View style={{ flex:1,justifyContent: "center",alignItems: "center", marginTop: 20}}>
				                      <Text style={{ textAlignVertical: "center",textAlign: "center"}}>Histori Transaksi</Text>
				                    </View>
				                  </View>
				                </View>
				        </CardItem>
				    </Card>
			</View>
		)
}
}