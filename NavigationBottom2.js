import React from 'react';
import { StyleSheet, View, ScrollView, Constants } from 'react-native';
import { BottomNavigation, Card } from 'react-native-material-ui';
import { FlatHeader } from 'react-native-flat-header';
import { Container, Header, Content, Footer, FooterTab, Button, Text, Body, Title } from 'native-base';
import Icon from 'react-native-vector-icons/FontAwesome';
import Pager from './Pager.js';

export default class NavigationBottom extends React.Component{
    constructor(state){
        super(state)
        this.state = {
            active : 'home'
        }
    }

    render(){
        return (
           <View style={{flex: 1, flexDirection : 'column', justifyContent : 'space-between'}}>
                <Container>
                        <View>
                          <Header>
                            <Body style={{justifyContent: 'center', alignItems: 'center'}}>
                              <Title>Online Stationary</Title>
                            </Body>
                          </Header>
                        </View>
                            


                            {
                            	this.state.active == 'shop' ?
                            		
                            			<View style={{flex : 1, padding: 10, marginBottom : 30}}>
                            		    	<Pager page={this.state.active} navigation={this.props.navigation}/>
                            			</View>
                            		
                            	:
                            		
                            			<Content>
                            				<Pager page={this.state.active} navigation={this.props.navigation}/>
                            			</Content>
                            		
                            }



                                <Footer>
                                <FooterTab>
                                    <Button vertical active={this.state.active == 'ewallet' ? true : false}
                                        onPress={() => this.setState({ active: 'ewallet' })}
                                    >
                                        <Icon name="dollar" style={{fontSize : 20, color: '#ffffff'}}/>
                                        <Text>Wallet</Text>
                                    </Button>
                                    <Button vertical active={this.state.active == 'shop' ? true : false}
                                        onPress={() => this.setState({ active: 'shop' })}
                                    >
                                        <Icon name="shopping-cart" style={{fontSize : 20, color: '#ffffff'}} />
                                        <Text>Shop</Text>
                                    </Button>
                                    <Button vertical active={this.state.active == 'home' ? true : false}
                                        onPress={() => this.setState({ active: 'home' })}
                                    >
                                        <Icon name="home" style={{fontSize : 20, color: '#ffffff'}} />
                                        <Text>Home</Text>
                                    </Button>
                                    <Button vertical active={this.state.active == 'printing' ? true : false}
                                        onPress={() => this.setState({ active: 'printing' })}
                                    >
                                        <Icon name="print" style={{fontSize : 20, color: '#ffffff'}} />
                                        <Text>Print</Text>
                                    </Button>
                                    <Button vertical active={this.state.active == 'setting' ? true : false}
                                        onPress={() => this.setState({ active: 'setting' })}
                                    >
                                        <Icon name="gear" style={{fontSize : 20, color: '#ffffff'}} />
                                        <Text>Setting</Text>
                                    </Button>
                                    </FooterTab>
                                </Footer>


                      </Container>
           </View>


        )
    }  
}


const styles = StyleSheet.create({
  container: {
    justifyContent: 'flex-end'
  }
})
