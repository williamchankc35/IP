<?xml version="1.0" encoding="UTF-8"?>


<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Customer List</title>
            </head>
            <body>
                <h1>Customer List</h1>
                <hr/>
                <table border="1">
                    <tr bgcolor="#bdfbff">
                        <th>No</th>
                        <th>Customer ID</th>
                        <th>Customer Type</th>
                        <th>Customer Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Credit Limit</th>
                        <th>Status</th>
                    </tr>
                    <xsl:for-each select="CustomerTable/CustomerRow">
                        <tr>
                            <td>
                                <xsl:value-of select="position()"/>
                            </td>
                            <td>
                                <xsl:value-of select="CusID"/>
                            </td>
                            <td>
                                <xsl:value-of select="CusType"/>
                            </td>
                            <td>
                                <xsl:value-of select="CusName"/>
                            </td>
                            <td>
                                <xsl:value-of select="Username"/>
                            </td>
                            <td>
                                <xsl:value-of select="Password"/>
                            </td>
                            <td>
                                <xsl:value-of select="Email"/>
                            </td>
                            <td>
                                <xsl:value-of select="CreditLimit"/>
                            </td>
                            <td>
                                <xsl:value-of select="Status"/>
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
