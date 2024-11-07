package com.example.appcriatil.app

import androidx.compose.animation.Crossfade
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.Screen
import com.example.appcriatil.screens.Home
import com.example.appcriatil.screens.TelaCadastro
import com.example.appcriatil.screens.TelaDeLogin
import com.example.appcriatil.screens.TelaDeTermosECondicoes

@Composable
fun CriatilApp(){
    Surface(
        modifier = Modifier.fillMaxSize(),
        color = Color.White
    ) {
        Crossfade(targetState = CriatilAppRouter.currentScreen) { currentState ->
            when (currentState.value) {
                is Screen.TelaCadastro -> TelaCadastro()
                is Screen.TelaDeTermosECondicoes -> TelaDeTermosECondicoes()
                is Screen.TelaDeLogin -> TelaDeLogin()
                is Screen.Home -> Home()
            }
        }
    }
}
