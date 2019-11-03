import React, { Component } from 'react';
import {
	View,
	ScrollView,
	ActivityIndicator,
	SafeAreaView,
	Text,
	StyleSheet,
	FlatList,
	TouchableHighlight,
	Modal,
	Button
} from 'react-native';

import PageGreeter from "../components/PageGreeter";
import { getBooks } from "../services/BookService";

export default class Babel extends Component {

	constructor(props) {
		super(props);
		this.state = {
			isLoading: true,
			error: false,
			books: null,
		}
	}

	componentDidMount() {
		getBooks().then((res) => {
			this.setState({
				books: res,
				isLoading: false
			})
		}, (err) => {
			this.setState({
				isLoading: false,
				error: true
			})
		})
	}

	handleModalVisibility() {

	}

	render() {
		if (this.state.isLoading) {
			return (
				<SafeAreaView style={styles.background}>
					<PageGreeter name="Babel" image="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
					<View style={styles.center}>
						<ActivityIndicator style={styles.center} />
					</View>
				</SafeAreaView>
			)
		} else if (this.state.error) {
			return (
				<SafeAreaView style={styles.background}>
					<PageGreeter name="Babel" image="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
					<View style={styles.center}>
						<Text> Erro ao carregar livros </Text>
					</View>
				</SafeAreaView>
			)
		}
		return (
			<SafeAreaView style={styles.background}>
				<PageGreeter name="Babel" image="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" />
				<ScrollView>
					<FlatList data={this.state.books} renderItem={({ item }) => (
						<>
							<TouchableHighlight onPress={() => { item.visible = true }}>
								<View style={styles.bookContainer}>
									<Text style={styles.bookTitle}>{item.name}</Text>
									<Text style={styles.bookDescription}>{item.description}</Text>
								</View>
							</TouchableHighlight>
						</>
					)}
					/>
				</ScrollView>
			</SafeAreaView>
		)
	};
}

const styles = StyleSheet.create({
	background: {
		flex: 1,
		backgroundColor: "#FFA251"
	},
	center: {
		flex: 1,
		alignContent: "center",
		justifyContent: "center"
	},
	bookContainer: {
		backgroundColor: "#ffffff",
		margin: 10,
		borderRadius: 2,
		padding: 16,
		justifyContent: "center"
	},
	bookTitle: {
		fontSize: 20,
		fontWeight: "bold"
	},
	bookDescription: {
		fontSize: 16,
	},
});

const BOOKS = [
	{
		id: "1",
		name: "Um Livro Top",
		description: "Pensa num livro incrível"
	},
	{
		id: "2",
		name: "Um Livro Foda",
		description: "Pensa num livro foda"
	},
	{
		id: "3",
		name: "Um Livro Gay",
		description: "Pensa num livro homo"
	},
	{
		id: "4",
		name: "Um Livro Homo",
		description: "Pensa num livro gay"
	},

]