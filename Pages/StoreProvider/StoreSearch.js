import React from 'react';
import { StyleSheet, View, ScrollView, Constants, TouchableOpacity } from 'react-native';
import { Container, Header, Item, Input, Icon, Button, Text, Left, Right, Body, Card, CardItem, Thumbnail } from 'native-base';

export default class StoreSearch extends React.Component{
    constructor(state){
        super(state)
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
   			  	  <Input placeholder="Cari" returnKeyType="search" />
   			  	</Item>

            <Item style={{maxWidth : 50, backgroundColor: 'inherit'}}>
              <Button rounded style={{elevation : 0}} >
                <Icon name='ios-cart' />
              </Button>
            </Item>
 
   			  </Header>
   			</View>

        <ScrollView style={{padding : 10, marginTop : 10}}>
        <TouchableOpacity onPress={() => this.props.navigation.navigate('ProductDetail')}>
          <Card>
            <CardItem>
            <Left>
              <Thumbnail source={{uri : 'https://megacomp.id/wp-content/uploads/2018/02/490-1.jpg'}}/>  
              <Body>
                <Text>Wacom Intuos 490</Text>
                <Text>Harga : Rp.900.000,-</Text>
              </Body>
            </Left>
            </CardItem>              
          </Card>
          </TouchableOpacity>

        </ScrollView>

   		</Container>
   	)
   }

}





