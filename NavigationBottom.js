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
                            
                            <View style={{flex : 1, padding: 10}}>
                                <Pager page={this.state.active} navigation={this.props.navigation}/>
                            </View>


                        <View style={styles.container}>
                            <BottomNavigation active={this.state.active} hidden={false} style={{ container : {paddingLeft : 5, paddingRight : 5} }}>
                                    <BottomNavigation.Action
                                        key="ewallet"
                                        icon={<Icon name="dollar" size={20}/>}
                                        label="E-Wallet"
                                        onPress={() => this.setState({ active: 'ewallet' })}
                                    />
                                    <BottomNavigation.Action
                                        key="shop"
                                        icon={<Icon name="shopping-cart" size={20}/>}
                                        label="E-Shopping"
                                        onPress={() => this.setState({ active: 'shop' })}
                                    />
                                    <BottomNavigation.Action
                                        key="home"
                                        icon={<Icon name="home" size={20}/>}
                                        label="Home"
                                        onPress={() => this.setState({ active: 'home' })}
                                    />
                                    <BottomNavigation.Action
                                        key="printing"
                                        icon={<Icon name="print" size={20}/>}
                                        label="Printing"
                                        onPress={() => this.setState({ active: 'printing' })}
                                    />
                                    <BottomNavigation.Action
                                        key="setting"
                                        icon={<Icon name="gear" size={20}/>}
                                        label="Settings"
                                        onPress={() => this.setState({ active: 'setting' })}
                                    />
                                </BottomNavigation>
                        </View>

                      </Container>
           </View>


        )
    }  
}


const styles = StyleSheet.create({
  container: {
    justifyContent: 'flex-end',
    paddingTop : 15
  }
})
