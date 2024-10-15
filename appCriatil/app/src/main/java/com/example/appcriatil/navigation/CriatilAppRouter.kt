package com.example.appcriatil.navigation

import androidx.compose.runtime.MutableState
import androidx.compose.runtime.mutableStateOf

sealed class Screen(){

    object TelaCadastro: Screen()
    object TelaDeTermosECondicoes: Screen()
    object TelaDeLogin: Screen()
}

object CriatilAppRouter {

    val currentScreen: MutableState<Screen> = mutableStateOf(Screen.TelaCadastro)

    fun navigateTo(destination: Screen){
        currentScreen.value = destination

    }
}