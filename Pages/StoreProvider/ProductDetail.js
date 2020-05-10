import React from 'react';
import { StyleSheet, View, ScrollView, Constants, TouchableOpacity, Image } from 'react-native';
import { Container, Header, Item, Input, Icon, Button, Text, Left, Right, Body, Card, CardItem, FooterTab, Content, Footer, Thumbnail, H1, H2, H3 } from 'native-base';
import Carousel from 'react-native-snap-carousel';

export default class ProductDetail extends React.Component{
	constructor(state){
		super(state)
		this.state = {
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
        ]
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
		return(
					<Container>
						<View>
						  <Header searchBar rounded>
						  	<Item style={{maxWidth : 50, backgroundColor: 'inherit'}}>
						  		<Button rounded style={{elevation : 0}} onPress={() => this.props.navigation.goBack()}>
						  		  <Icon name='arrow-back' />
						  		</Button>
						  	</Item>

						  	<Item>
						  	  <Icon name="ios-search" />
						  	  <Input placeholder="Cari" returnKeyType="search" showSoftInputOnFocus={false} caretHidden={true} onTouchStart={()=> this.props.navigation.navigate('StoreSearch')}/>
						  	</Item>

			         <Item style={{maxWidth : 50, backgroundColor: 'inherit'}}>
			           <Button rounded style={{elevation : 0}} >
			             <Icon name='ios-cart' />
			           </Button>
			         </Item>
			
						  </Header>
						</View>

						<Content>

						<View>
							<Carousel
							  layout={"default"}
							  ref={ref => this.carousel = ref}
							  data={this.state.carouselItems}
							  sliderWidth={600}
							  itemWidth={600}
							  renderItem={this._renderItem}
							  onSnapToItem = { index => this.setState({activeIndex:index}) } />
						</View>
						<Card>
							<CardItem>
								<Left>
									<Body>
										<H1>Wacom Intuos</H1>
										<Text>Rp. 900.000,-</Text>
									</Body>
								</Left>
							</CardItem>
							<CardItem style={{paddingTop : 20}}>
								<Left>
									<Body>
									<Text>Stok</Text>
									<Text>Kode SKU</Text>
									</Body>
								</Left>

								<Right>
									<Text>100</Text>
									<Text>xxx|ioa|12901</Text>
								</Right>
							</CardItem>
							<CardItem>
								<Left>
								<Text>Deskripsi</Text>
								</Left>
							</CardItem>
						</Card>
						</Content>

						<Footer>
						<FooterTab>
							<Button>
								<Icon name='ios-add'/>
								<Text>Beli</Text>
							</Button>
							<Button>
								<Icon name='cart'/>
								<Text>Masukkan Ke Keranjang</Text>
							</Button>
						</FooterTab>
						</Footer>

					</Container>
		)
	}
}