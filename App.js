import React from 'react';
import { StyleSheet, Text, View, StatusBar , KeyboardAvoidingView} from 'react-native';
import { BottomNavigation } from 'react-native-material-ui';
import NavigationBottom from './NavigationBottom2.js';
import * as Font from 'expo-font';
import { Ionicons } from '@expo/vector-icons';
import { NavigationContainer } from '@react-navigation/native'
import { createStackNavigator } from '@react-navigation/stack'
import EStore from './Pages/Estore.js';
import StoreSearch from './Pages/StoreProvider/StoreSearch.js';
import Dummy from './Pages/Dummy.js';
import {createStore} from 'redux';
import { Provider as StoreProvider} from 'react-redux';
import store from './Actionate/storeStore.js';
import ProductDetail from './Pages/StoreProvider/ProductDetail.js';


const Stack = createStackNavigator();


class Home extends React.Component{
    constructor(state){
      super(state);
      this.state = {
        active : 'home'
      }
  }


  render(){
    return( 
        <NavigationBottom navigation={this.props.navigation}/>
    )
  }
}


export default class App extends React.Component{
    constructor(state){
      super(state);
      this.state = {

      }
  }

  async componentDidMount() {
    await Font.loadAsync({
      Roboto: require('native-base/Fonts/Roboto.ttf'),
      Roboto_medium: require('native-base/Fonts/Roboto_medium.ttf'),
      ...Ionicons.font,
    });
    this.setState({ isReady: true });
  }

  render(){
    return (

      <StoreProvider store={store}>
      <NavigationContainer >
        <Stack.Navigator initialRouteName='Home'>
          <Stack.Screen name='Home' component={Home} options={{ headerShown: false }} />
          <Stack.Screen name='StoreSearch' component={StoreSearch} options={{ headerShown: false }} />
          <Stack.Screen name='ProductDetail' component={ProductDetail} options={{headerShown : false}} />
        </Stack.Navigator>
      </NavigationContainer>
      </StoreProvider>

        

        
    )
  }
}


