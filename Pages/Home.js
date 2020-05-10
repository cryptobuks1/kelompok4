import React from 'react';
import { StyleSheet, View, SafeAreaView, TouchableNativeFeedback, Text, Image } from 'react-native';
import { Content } from 'native-base';
import { BottomNavigation, Card } from 'react-native-material-ui';
import Carousel from 'react-native-snap-carousel';
import store from '../Actionate/storeStore.js';


export default class Home extends React.Component{
	constructor(state){
		super(state)
		this.state = {
			activeIndex:0,
			carouselItems: [
          {
              image : "https://pbs.twimg.com/media/ETtfATbU8AAH0LZ.jpg"
          },
          {
          		image : "https://pbs.twimg.com/media/ETtfATOUEAMYmsA.jpg"
          },
          {
          		image : "https://i.imgur.com/Mc8WoAb.jpg"
          },
          {
          		image : "https://i.ytimg.com/vi/rRtfuALE8AU/maxresdefault.jpg"
          },
          {
          		image : "https://i.pinimg.com/originals/ea/53/fa/ea53fae9eb7dfa7d605ce2e980a89278.jpg"
          }
        ],
        	addtr : store.getState()
		}
	}

	_renderItem({item,index}){
	    return (
	      <View style={{
	          backgroundColor:'floralwhite',
	          borderRadius: 5,
	          height: 200,
	      	  weight: null}}>
	        <Image source={{uri: item.image}} style={{height: undefined, width: undefined, flex: 1}} resizeMethod='auto' resizeMode='repeat'/>
	      </View>

	    )
	}

	render(){
		return (
			<View>
			<Card>
			    <Carousel
			      layout={"default"}
			      ref={ref => this.carousel = ref}
			      data={this.state.carouselItems}
			      sliderWidth={600}
			      itemWidth={600}
			      renderItem={this._renderItem}
			      onSnapToItem = { index => this.setState({activeIndex:index}) } />
			</Card>
			<Text>{this.state.addtr.token}</Text>
			</View>
		)
	}
}