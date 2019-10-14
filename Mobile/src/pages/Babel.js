import React, { Component } from 'react';
import { View, 
    ScrollView, 
    SafeAreaView, 
    Text, 
    StyleSheet,
    FlatList } 
from 'react-native';

import PageGreeter from "../components/PageGreeter";

export default class Babel extends Component {
    render(){
        return (
            <SafeAreaView style={styles.background}>
                   <PageGreeter name="Babel" image="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80"/>
                   <FlatList data={BOOKS} renderItem={ ({item}) => (
                       <View style={styles.bookContainer}>
                           <Text style={styles.bookTitle}>{item.name}</Text>
                           <Text style={styles.bookDescription}>{item.description}</Text>
                       </View>
                   )}
                   />
            </SafeAreaView>
        )};
}

const styles = StyleSheet.create({
    background: {
        flex:1,
        backgroundColor: "#FFA251"
    },
    bookContainer: {
        backgroundColor:"#ffffff",
        margin:10,
        borderRadius:2,
        padding:16,
        justifyContent:"center"
    },
    bookTitle: {
        fontSize:20,
        fontWeight:"bold"
    },
    bookDescription: {
        fontSize:16,
    }
});

const BOOKS = [
    {
        id:"1",
        name:"Um Livro Top",
        description:"Pensa num livro incrível"
    },
    {
        id:"2",
        name:"Um Livro Foda",
        description:"Pensa num livro foda"
    },
    {
        id:"3",
        name:"Um Livro Gay",
        description:"Pensa num livro homo"
    },
    {
        id:"4",
        name:"Um Livro Homo",
        description:"Pensa num livro gay"
    },
    
]