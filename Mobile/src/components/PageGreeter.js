import React, {Component} from 'react';
import { View, StyleSheet, ImageBackground, Text } from 'react-native';

export default class PageGreeter extends Component {
  render() {
    return (
      <View>
        <ImageBackground source={{uri: this.props.image}} style={styles.container}>
          <Text style={styles.pageTitle}>{this.props.name}</Text>
        </ImageBackground>
      </View>
    )};
}

const styles = StyleSheet.create({
    container:{
      alignItems:"center",
      justifyContent:"center",
      height:200
    },
    pageTitle:{
      fontSize:32,
      fontWeight:"bold",
      color: "lightgrey"
    }
})