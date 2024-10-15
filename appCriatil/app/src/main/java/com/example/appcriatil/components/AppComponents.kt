@file:OptIn(ExperimentalMaterial3Api::class, ExperimentalMaterial3Api::class,
    ExperimentalMaterial3Api::class
)

package com.example.appcriatil.components

import android.util.Log
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.PaddingValues
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.heightIn
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.text.ClickableText
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material3.ExperimentalMaterial3Api
import androidx.compose.material3.Icon
import androidx.compose.material3.IconButton
import androidx.compose.material3.OutlinedTextField
import androidx.compose.material3.Text
import androidx.compose.material3.TextFieldDefaults
import androidx.compose.runtime.Composable
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.ui.Modifier
import androidx.compose.ui.draw.clip
import androidx.compose.ui.graphics.painter.Painter
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.res.stringResource
import androidx.compose.ui.text.TextStyle
import androidx.compose.ui.text.font.FontStyle
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appcriatil.R
import com.example.appcriatil.ui.theme.BgColor
import com.example.appcriatil.ui.theme.Primary
import com.example.appcriatil.ui.theme.TextColor
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Visibility
import androidx.compose.material.icons.filled.VisibilityOff
import androidx.compose.material3.Button
import androidx.compose.material3.ButtonDefaults
import androidx.compose.material3.Checkbox
import androidx.compose.material3.Divider
import androidx.compose.ui.Alignment
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.colorResource
import androidx.compose.ui.text.AnnotatedString
import androidx.compose.ui.text.SpanStyle
import androidx.compose.ui.text.buildAnnotatedString
import androidx.compose.ui.text.input.PasswordVisualTransformation
import androidx.compose.ui.text.input.VisualTransformation
import androidx.compose.ui.text.withStyle
import com.example.appcriatil.ui.theme.Secondary

@Composable
fun ElementoTextoBasico(value:String){
    Text(
        text = value,
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 24.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal
        )
        , color = TextColor,
          textAlign = TextAlign.Center
    )
}

@Composable
fun ElementoTextoTitulo(value:String){
    Text(
        text = value,
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(),
        style = TextStyle(
            fontSize = 30.sp,
            fontWeight = FontWeight.Bold,
            fontStyle = FontStyle.Normal
        )
        , color = TextColor,
        textAlign = TextAlign.Center
    )
}

@OptIn(ExperimentalMaterial3Api::class)
@Composable
fun ElementoTextField(labelValue: String, painterResource: Painter){

    val textValue = remember {
        mutableStateOf("")
    }

    OutlinedTextField(
        modifier = Modifier
            .fillMaxWidth()
            .clip(RoundedCornerShape(4.dp))
            .background(BgColor),
        label = { Text(text = labelValue) },
        colors = TextFieldDefaults.outlinedTextFieldColors(
            focusedBorderColor = Primary,
            focusedLabelColor = Primary,
            cursorColor = Primary
        ),
        keyboardOptions = KeyboardOptions.Default,
        value = textValue.value,
        onValueChange = {
            textValue.value = it
        },
        leadingIcon = {
            Icon(painter = painterResource, contentDescription = "")
        }
    )
}

@Composable
fun ElementoSenhaTextField(labelValue: String, painterResource: Painter){

    val senha = remember {
        mutableStateOf("")
    }

    val senhaVisivel = remember {
        mutableStateOf(false)
    }

    OutlinedTextField(
        modifier = Modifier
            .fillMaxWidth()
            .clip(RoundedCornerShape(4.dp))
            .background(BgColor),
        label = { Text(text = labelValue) },
        colors = TextFieldDefaults.outlinedTextFieldColors(
            focusedBorderColor = Primary,
            focusedLabelColor = Primary,
            cursorColor = Primary
        ),
        keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
        value = senha.value,
        onValueChange = {
            senha.value = it
        },
        leadingIcon = {
            Icon(painter = painterResource, contentDescription = "")
        },
        trailingIcon = {
            val iconImage = if (senhaVisivel.value) {
                Icons.Filled.Visibility
            } else {
                Icons.Filled.VisibilityOff
            }

            val description = if(senhaVisivel.value){
                stringResource(id = R.string.esconderSenha)
            }else{
                stringResource(id = R.string.mostrarSenha)
            }

            IconButton(onClick = { senhaVisivel.value = !senhaVisivel.value }) {
                Icon(imageVector = iconImage, contentDescription = description)
            }
        },
        visualTransformation = if (senhaVisivel.value) VisualTransformation.None else PasswordVisualTransformation()
    )
}

@Composable
fun ElementoCheckbox(value: String, onTextSelected: (String) -> Unit) {
    val checkedState = remember { mutableStateOf(false) }

    Row(
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(56.dp),
        verticalAlignment = Alignment.CenterVertically
    ) {
        Checkbox(
            checked = checkedState.value,
            onCheckedChange = { newValue ->
                checkedState.value = newValue
            }
        )

        ElementoTextoClicavel(value = value, onTextSelected)
    }
}

@Composable
fun ElementoTextoClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Assinalar significa que você concorda com as "
    val politicaPrivacidade = "políticas de privacidade"
    val e = " e "
    val termosDeUso = "termos de uso"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = politicaPrivacidade, annotation = politicaPrivacidade)
            append(politicaPrivacidade)
        }
        append(e)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = termosDeUso, annotation = termosDeUso)
            append(termosDeUso)
        }
    }

    ClickableText(text = annotatedString , onClick ={ offset ->
        annotatedString.getStringAnnotations(offset, offset)
            .firstOrNull()?.also { span ->
                Log.d("ElementoTextoClicavel", "{${span.item}}")

                if((span.item == politicaPrivacidade) || (span.item == termosDeUso)){
                    onTextSelected(span.item)
                }
            }

    })
}

@Composable
fun ElementoBotao(value: String, onClick: () -> Unit){
    Button(onClick = { /*TODO*/},
        modifier = Modifier
            .fillMaxWidth()
            .heightIn(48.dp),
        contentPadding = PaddingValues(),
        colors = ButtonDefaults.buttonColors(Color.Transparent)
        ) {
            Box(modifier = Modifier
                .fillMaxWidth()
                .heightIn(48.dp)
                .background(
                    brush = Brush.horizontalGradient(listOf(Secondary, Primary)),
                    shape = RoundedCornerShape(50.dp)
                ),
                contentAlignment = Alignment.Center
            ){
                Text(text = value,
                    fontSize = 18.sp,
                    fontWeight = FontWeight.Bold)
            }
    }
}

@Composable
fun ElementoDivisorComTexto(){
    Row(
        modifier = Modifier.fillMaxWidth(),
        verticalAlignment = Alignment.CenterVertically
    ) {
        Divider(
            modifier = Modifier
                .fillMaxWidth()
                .weight(1f),
            color = Color.LightGray,
            thickness = 1.dp
        )

        Text(
            text = "ou",
            fontSize = 18.sp,
            color = Color.LightGray,
            modifier = Modifier.padding(horizontal = 8.dp)
        )

        Divider(
            modifier = Modifier
                .fillMaxWidth()
                .weight(1f),
            color = Color.LightGray,
            thickness = 1.dp
        )
    }
}

@Composable
fun ElementoTextoLoginClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Já tem uma conta? "
    val login = "Faça login"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = login, annotation = login)
            append(login)
        }
    }

    ClickableText(modifier = Modifier
        .fillMaxWidth()
        .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 18.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal,
            textAlign = TextAlign.Center
        ),
        text = annotatedString, onClick ={ offset ->
        annotatedString.getStringAnnotations(offset, offset)
            .firstOrNull()?.also { span ->
                Log.d("ElementoTextoLoginClicavel", "{${span.item}}")

                if(span.item == login){
                    onTextSelected(span.item)
                }
            }

    })
}

@Composable
fun ElementoTextoCadastroClicavel(value: String , onTextSelected: (String) -> Unit){
    val textoInicial = "Não possui uma conta? "
    val cadastro = "Faça cadastro"

    val annotatedString = buildAnnotatedString {
        append(textoInicial)
        withStyle(style = SpanStyle(color = Color.Blue)) {
            pushStringAnnotation(tag = cadastro, annotation = cadastro)
            append(cadastro)
        }
    }

    ClickableText(modifier = Modifier
        .fillMaxWidth()
        .heightIn(min = 40.dp),
        style = TextStyle(
            fontSize = 18.sp,
            fontWeight = FontWeight.Normal,
            fontStyle = FontStyle.Normal,
            textAlign = TextAlign.Center
        ),
        text = annotatedString, onClick ={ offset ->
            annotatedString.getStringAnnotations(offset, offset)
                .firstOrNull()?.also { span ->
                    Log.d("ElementoTextoCadastroClicavel", "{${span.item}}")

                    if(span.item == cadastro){
                        onTextSelected(span.item)
                    }
                }

        })
}