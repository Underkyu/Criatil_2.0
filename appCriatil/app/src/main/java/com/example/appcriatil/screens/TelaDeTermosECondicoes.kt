package com.example.appcriatil.screens

import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Spacer
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.material3.Surface
import androidx.compose.runtime.Composable
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.navigation.NavController
import com.example.appcriatil.MainActivity
import com.example.appcriatil.R
import com.example.appcriatil.components.ElementoTextoBasico
import com.example.appcriatil.components.ElementoTextoTitulo
import com.example.appcriatil.navigation.CriatilAppRouter
import com.example.appcriatil.navigation.SystemBackButtonHandler

@Composable
fun TelaDeTermosECondicoes(navController: NavController, mainActivity: MainActivity) {
    Surface(modifier = Modifier
        .fillMaxSize()
        .background(color = Color.White)
        .padding(16.dp)){

        Column {
            ElementoTextoTitulo(value = stringResource(R.string.TituloTermosECondicoes))

            Spacer(modifier = Modifier.height(50.dp))

            ElementoTextoBasico(value = stringResource(R.string.TermosECondicoes))
        }
        SystemBackButtonHandler {
            navController.navigate(CriatilAppRouter.cadastro)
        }
    }
}

@Preview
@Composable
fun DefaultPreviewOfTelaDeTermosECondicoes(){
    //TelaDeTermosECondicoes()
}